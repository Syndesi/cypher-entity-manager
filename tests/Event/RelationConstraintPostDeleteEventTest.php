<?php

declare(strict_types=1);

namespace Syndesi\CypherEntityManager\Tests\Trait;

use PHPUnit\Framework\TestCase;
use Syndesi\CypherDataStructures\Type\RelationConstraint;
use Syndesi\CypherEntityManager\Event\RelationConstraintPostDeleteEvent;

class RelationConstraintPostDeleteEventTest extends TestCase
{
    public function testConstraintPostDeleteEvent(): void
    {
        $element = new RelationConstraint();
        $event = new RelationConstraintPostDeleteEvent($element);
        $this->assertSame($element, $event->getElement());
    }

    public function testElementManipulation(): void
    {
        $element = new RelationConstraint();
        $element->setType('UNIQUE');
        $event = new RelationConstraintPostDeleteEvent($element);
        $this->assertSame('UNIQUE', $event->getElement()->getType());
        $event->getElement()->setType('NOT_NULL');
        $this->assertSame('NOT_NULL', $event->getElement()->getType());
    }
}
