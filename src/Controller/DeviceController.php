<?php

namespace App\Controller;

use App\Entity\Device;
use App\Form\DeviceForm;
use App\Repository\DeviceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class DeviceController extends AbstractController
{
    #[Route('/', name: 'device_index')]
    public function index(DeviceRepository $deviceRepository): Response
    {
        $devices = $deviceRepository->findAll();
        return $this->render('device/index.html.twig', [
            'devices' => $devices,
        ]);
    }
    
    #[Route('/new', name: 'device_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $device = new Device();
        $form = $this->createForm(DeviceForm::class, $device);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() and $form->isValid()) {
            $device = $form->getData();

            $entityManager->persist($device);
            $entityManager->flush();

            return $this->redirectToRoute('device_index');
        }

        return $this->renderForm('device/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/edit/{id}', name: 'device_edit')]
    public function edit(Device $device, Request $request, EntityManagerInterface $entityManager): Response
    {        
        $form = $this->createForm(DeviceForm::class, $device);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() and $form->isValid()) {
            $device = $form->getData();

            $entityManager->persist($device);
            $entityManager->flush();

            return $this->redirectToRoute('device_index');
        }

        return $this->renderForm('device/edit.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'device_delete')]
    public function delete(Device $device, Request $request, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($device);
        $entityManager->flush();

        return $this->redirectToRoute('device_index');
    }

    #[Route('/show/{id}', name: 'device_show')]
    public function show(Device $device): Response
    {
        return $this->render('device/show.html.twig', [
            'device' => $device,
        ]);
    }
}
