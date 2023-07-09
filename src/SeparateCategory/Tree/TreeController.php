<?php

declare(strict_types=1);

namespace App\SeparateCategory\Tree;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TreeController extends AbstractController
{
    #[Route('/tree/breadthSearch/{value}', name: 'TreeBreadth')]
    public function indexBreadthSearch(?float $value = null): Response
    {
        $tree = $this->fillTree();

        $start = hrtime(true);
        $bfsResult = $tree->breadthFirstSearch($value);
        $end = hrtime(true);

        echo ('<pre>');
        echo("Поиск в ширину: " . implode(", ", $bfsResult['trace']) . PHP_EOL);
        echo ('</pre>');

        echo ('<pre>');
        echo("Нашлось ли число: " . ($bfsResult['found'] ? 'нашлось' : 'не нашлось') . PHP_EOL);
        echo ('</pre>');

        echo ('<pre>');
        echo("Время выполнения: " . ($end - $start) / 1e+6 ). PHP_EOL;
        echo ('</pre>');

        return $this->render('/base.html.twig');
    }

    #[Route('/tree/depthSearch/{value}', name: 'TreeDepth')]
    public function indexDepthSearch(?float $value = null): Response
    {
        $tree = $this->fillTree();

        $start = hrtime(true);
        $dfsResult = $tree->depthFirstSearch($value);
        $end = hrtime(true);

        echo ('<pre>');
        echo("Поиск в глубину: " . implode(", ", $dfsResult['trace']) . PHP_EOL);
        echo ('</pre>');

        echo ('<pre>');
        echo("Нашлось ли число: " . $dfsResult['found'] ? 'нашлось' : 'не нашлось' . PHP_EOL);
        echo ('</pre>');

        echo ('<pre>');
        echo("Время выполнения: " . ($end - $start) / 1e+6 ). PHP_EOL;
        echo ('</pre>');

        return $this->render('/base.html.twig');
    }

    private function fillTree(): BinaryTree
    {
        $tree = new BinaryTree();
        $tree->insert(5);
        $tree->insert(3);
        $tree->insert(8);
        $tree->insert(2);
        $tree->insert(4);
        $tree->insert(7);
        $tree->insert(9);

        return $tree;
    }
}