<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\LoginForm;
use App\Entity\User;
use App\Service\FileUploader;
use App\Repository\CustomerRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiPicomController extends AbstractController
{


    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }


    /**
     * @Route("/registration", name="api_registration", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param CustomerRepository $customerRepository
     */
    public function registration(Request $request, EntityManagerInterface $em, CustomerRepository $customerRepository)

    {
       
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonReceived = $request->getContent();

        $customer = $serializer->deserialize($jsonReceived, Customer::class, 'json');
        echo $customer;
        $role = $customer->getRoles();
        $customer->setRoles($role);
        $plainPassword = $customer->getPassword();
        $customer->setPassword($this->hasher->hashPassword($customer, $plainPassword));

        $em->persist($customer);
        $em->flush();

        $customers = $customerRepository->findAll();
        dd($customers);



    }

    /**
     * @Route("/api/login", name="login", methods={"POST"})
     *
     */
    public function login(Request $request, UserRepository $userRepository) : Response
      {

          echo "function login";

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonReceived = $request->getContent();
        $login = $serializer->deserialize($jsonReceived, LoginForm::class, 'json');

        $user = $userRepository->findOneBy(['email'=>$login->getEmail()]);
        if ($this->hasher->isPasswordValid($user, $login->getPassword())) {
            $response = new JsonResponse($user, 200, [], true);
            return $response;
            return $this->json(array(
                'email' => $user->getEmail(),
                'roles' => $user->getRoles(),
            ));

        }

        else {
            return "token";
        }

        }

    /**
     * @Route("/uploadimage", name="uploadimage", methods={"POST"})
     * @param string $uploadDir
     */
    public function uploadImage(Request $request,FileUploader $uploader)
    {
        
        $file = $request->files->get('picture');
        $data=$request->request->all();
        if (empty($file))
        {
            return new Response("No file specified",
               Response::HTTP_UNPROCESSABLE_ENTITY, ['content-type' => 'application/json']);
        }
        $uploadDir="/picture/";
        $filename = $file->getClientOriginalName();
        $uploader->upload($uploadDir, $file, $filename);
        return new Response("File uploaded",  Response::HTTP_OK,
        ['content-type' => 'application/json']);
    }


}
