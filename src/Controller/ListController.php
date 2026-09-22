<?php

namespace App\Controller;

use App\Entity\Note;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\NoteType;
use App\Repository\NotesRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

final class ListController extends AbstractController
{
    #[Route('/', name: 'main_list')]
    public function index(NotesRepository $repository): Response
    {
        return $this->render('list.html.twig', [
            'title' => 'Notes list/tasks - Daineka homework',
            'notes' => $repository->findAll(),
        ]);
    }

    #[Route('/note/{id<\d+>}', name: 'note_show')]
    public function show(Note $note): Response
    {
        return $this->render('show.html.twig', [
            'title' => $note->getName(),
            'note' => $note
        ]);
    }

    #[Route('/note/new', name: 'note_new')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $note = new Note;

        $form = $this->createForm(NoteType::class, $note);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->persist($note);

            $manager->flush();

            $this->addFlash(
                'notice',
                'Note created successfully!'
            );

            return $this->redirectToRoute('note_show', [
                'id' => $note->getId(),
            ]);

        }

        return $this->render('new.html.twig', [
            'form' => $form,
            'title' => 'New note'
        ]);
    }

    #[Route('/note/{id<\d+>}/edit', name: 'note_edit')]
    public function edit(Note $note, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(NoteType::class, $note);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $manager->flush();

            $this->addFlash(
                'notice',
                'Note updated successfully!'
            );

            return $this->redirectToRoute('note_show', [
                'id' => $note->getId(),
            ]);

        }

        return $this->render('edit.html.twig', [
            'form' => $form,
            'title' => 'Edit note'
        ]);
    }

    #[Route('/note/{id<\d+>}/delete', name: 'note_delete')]
    public function delete(Request $request, Note $note, EntityManagerInterface $manager): Response
    {
        if ($request->isMethod('POST')) {

            $manager->remove($note);

            $manager->flush();

            $this->addFlash(
                'notice',
                'Note deleted successfully!'
            );

            return $this->redirectToRoute('main_list');

        }

        return $this->render('delete.html.twig', [
            'id' => $note->getId(),
            'title' => $note->getName(),
        ]);
    }
}
