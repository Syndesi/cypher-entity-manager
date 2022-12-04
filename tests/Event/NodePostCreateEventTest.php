<?php

declare(strict_types=1);

namespace Syndesi\CypherEntityManager\Tests\Trait;

use PHPUnit\Framework\TestCase;
use Syndesi\CypherDataStructures\Type\Node;
use Syndesi\CypherEntityManager\Event\NodePostCreateEvent;

class NodePostCreateEventTest extends TestCase
{
    public function testNodePostCreateEvent(): void
    {
        $element = new Node();
        $event = new NodePostCreateEvent($element);
        $this->assertSame($element, $event->getElement());
    }

    public function testElementManipulation(): void
    {
        $element = new Node();
        $element->addLabel('Label');
        $event = new NodePostCreateEvent($element);
        $this->assertTrue($event->getElement()->hasLabel('Label'));
        $event->getElement()->removeLabel('Label');
        $this->assertFalse($event->getElement()->hasLabel('Label'));
    }
}
