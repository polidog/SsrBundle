<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2017/02/22
 */

namespace Polidog\SsrBundle\Tests\Render;


use Koriym\Baracoa\BaracoaInterface;
use PHPUnit\Framework\TestCase;
use Polidog\SsrBundle\Annotations\Ssr;
use Polidog\SsrBundle\Render\SsrRender;
use Prophecy\Argument;

class SsrRenderTest extends TestCase
{

    public function testRender()
    {
        $app = 'index_ssr';
        $meta = ['title'];
        $state = ['hello'];

        $parameters = [
            'title' => 'hogehoge',
            'hello' => [
                'name' => 'polidog'
            ]
        ];

        $baracoa = $this->prophesize(BaracoaInterface::class);
        $baracoa->render(Argument::any(),Argument::any(),Argument::any())
            ->willReturn("string");

        $ssr = new Ssr([]);
        $ssr->setApp($app);
        $ssr->setMetas($meta);
        $ssr->setState($state);

        $ssrRender = new SsrRender($baracoa->reveal());
        $ssrRender->render($ssr, $parameters);



        $baracoa->render(
            $ssr->getApp(),
            ['hello' => ['name' => 'polidog']],
            ['title' => 'hogehoge']
        )->shouldHaveBeenCalled();
    }
}