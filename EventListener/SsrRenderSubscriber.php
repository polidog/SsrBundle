<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2017/02/21
 */

namespace Polidog\SsrBundle\EventListener;


use Polidog\SsrBundle\Annotations\Ssr;
use Polidog\SsrBundle\Render\SsrRenderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class SsrRenderSubscriber implements EventSubscriberInterface
{
    /**
     * @var SsrRenderInterface
     */
    protected $ssrRender;

    /**
     * SsrListener constructor.
     * @param SsrRenderInterface $ssrRender
     */
    public function __construct(SsrRenderInterface $ssrRender)
    {
        $this->ssrRender = $ssrRender;
    }


    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $request = $event->getRequest();
        $response = $event->getResponse();

        /** @var Ssr $ssr */
        $ssr = $request->attributes->get('_ssr');
        $content = $this->ssrRender->render($ssr, $event->getControllerResult());
        if (null === $response) {
            $response = new Response();
        }
        $response->setContent($content);
        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => 'onKernelView',
        ];
    }



}