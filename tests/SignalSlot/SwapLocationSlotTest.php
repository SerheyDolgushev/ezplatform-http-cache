<?php

/**
 * This file is part of the eZ Publish Kernel package.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace EzSystems\PlatformHttpCacheBundle\Tests\SignalSlot;

use eZ\Publish\Core\SignalSlot\Signal\LocationService\SwapLocationSignal;

class SwapLocationSlotTest extends AbstractContentSlotTest
{
    protected $locationId = 45;
    protected $parentLocationId = 43;

    protected $swapContentId = 62;
    protected $swapLocationId = 65;
    protected $swapParentLocationId = 63;

    public function createSignal()
    {
        return new SwapLocationSignal([
            'content1Id' => $this->contentId,
            'location1Id' => $this->locationId,
            'parentLocation1Id' => $this->parentLocationId,
            'content2Id' => $this->swapContentId,
            'location2Id' => $this->swapLocationId,
            'parentLocation2Id' => $this->swapParentLocationId,
        ]);
    }

    public function generateTags()
    {
        return [
            'content-' . $this->contentId,
            'path-' . $this->locationId,
            'location-' . $this->parentLocationId,
            'parent-' . $this->parentLocationId,
            'content-' . $this->swapContentId,
            'path-' . $this->swapLocationId,
            'location-' . $this->swapParentLocationId,
            'parent-' . $this->swapParentLocationId,
        ];
    }

    public function getSlotClass()
    {
        return 'EzSystems\PlatformHttpCacheBundle\SignalSlot\SwapLocationSlot';
    }

    public function getReceivedSignalClasses()
    {
        return [SwapLocationSignal::class];
    }
}
