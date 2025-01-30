<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('api')]
class TestController extends AbstractController
{
    private array $users = [
        ['id' => 1, 'name' => 'John'],
        ['id' => 2, 'name' => 'Jane'],
        ['id' => 3, 'name' => 'Biden'],
    ];

    #[Route('/users', name: 'get_users', methods: ['GET'])]
    public function getUsers(): JsonResponse
    {
        if (empty($this->users)) {
            return $this->json(['message' => 'No users found'], 404);
        }

        return $this->json($this->users, 200);
    }

    #[Route('/users/{id}', name: 'get_user', methods: ['GET'])]
    public function getUserById(int $id): JsonResponse
    {
        $user = array_filter($this->users, fn($u) => $u['id'] === $id);
        if (empty($user)) {
            return $this->json(['error' => 'User not found'], 404);
        }
        return $this->json(['message' => 'User found', 'data' => array_values($user)[0]], 200);
    }

    #[Route('/users', name: 'add_user', methods: ['POST'])]
    #[IsGranted('ROLE_ADMIN')]
    public function addUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['name'])) {
            return $this->json(['error' => 'Field "name" is required'], 400);
        }

        $newUser = ['id' => count($this->users) + 1, 'name' => $data['name']];
        $this->users[] = $newUser;

        return $this->json(['message' => 'User added successfully', 'data' => $this->users], 201);
    }

    #[Route('/users/{id}', name: 'update_user', methods: ['PATCH'])]
    public function updateUser(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $key = array_search($id, array_column($this->users, 'id'));
        if ($key === false) {
            return $this->json(['error' => 'User not found'], 404);
        }

        if (isset($data['name'])) {
            $this->users[$key]['name'] = $data['name'];
        }

        return $this->json(['message' => 'User updated', 'data' => $this->users], 200);
    }

    #[Route('/users/{id}', name: 'delete_user', methods: ['DELETE'])]
    public function deleteUser(int $id): JsonResponse
    {
        $key = array_search($id, array_column($this->users, 'id'));
        if ($key === false) {
            return $this->json(['error' => 'User not found'], 404);
        }

        unset($this->users[$key]);
        $this->users = array_values($this->users);

        return $this->json(['message' => 'User deleted', 'data' => $this->users], 200);
    }
}