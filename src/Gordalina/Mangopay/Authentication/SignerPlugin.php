<?php

/*
 * This file is part of the mangopay package.
 *
 * (c) Samuel Gordalina <https://github.com/gordalina/mangopay>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gordalina\Mangopay\Authentication;

use Guzzle\Common\Event;
use Guzzle\Http\Message\EntityEnclosingRequest;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SignerPlugin implements EventSubscriberInterface
{
    /**
     * @var Signer
     */
    protected $signer;

    /**
     * @param Signer $signer
     */
    public function __construct(Signer $signer)
    {
        $this->signer = $signer;
    }

    public static function getSubscribedEvents()
    {
        return array(
            'request.before_send' => array('onRequestBeforeSend', -1000)
        );
    }

    /**
     * Request before-send event handler
     *
     * @param Event $event Event received
     * @return null
     */
    public function onRequestBeforeSend(Event $event)
    {
        $request = $event['request'];
        $timestamp = $this->getTimestamp($event);

        $url = $request->getUrl(true);
        $url->getQuery()->add('ts', $timestamp);

        $body = '';
        $path = sprintf('%s?%s', $url->getPath(), (string) $url->getQuery());

        if ($request instanceof EntityEnclosingRequest) {
            $body = $request->getBody();
        }

        $signature = $this->signer->getSignature($request->getMethod(), $path, $body);

        $request->setUrl($url);
        $request->setHeader('Content-Type', 'application/json');
        $request->setHeader('X-Leetchi-Signature', $signature);
    }

    /**
     * Gets timestamp from event or create new timestamp
     *
     * @param Event $event Event containing contextual information
     *
     * @return int
     */
    public function getTimestamp(Event $event)
    {
       return $event['timestamp'] ?: time();
    }
}
