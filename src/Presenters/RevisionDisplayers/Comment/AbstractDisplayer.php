<?php

/**
 * This file is part of Bootstrap CMS by Graham Campbell.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 */

namespace GrahamCampbell\BootstrapCMS\Presenters\RevisionDisplayers\Comment;

use GrahamCampbell\BootstrapCMS\Presenters\RevisionDisplayers\AbstractRevisionDisplayer;

/**
 * This is the abstract displayer class.
 *
 * @package    Bootstrap-CMS
 * @author     Graham Campbell
 * @copyright  Copyright (C) 2013-2014  Graham Campbell
 * @license    https://github.com/GrahamCampbell/Bootstrap-CMS/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Bootstrap-CMS
 */
abstract class AbstractDisplayer extends AbstractRevisionDisplayer
{
    /**
     * Get the post name.
     *
     * @return string
     */
    protected function name()
    {
        $comment = $this->resource->revisionable()->withTrashed()
            ->cacheDriver('array')->rememberForever()
            ->first(array('post_id'));

        $post = $comment->post()->withTrashed()
            ->cacheDriver('array')->rememberForever()
            ->first(array('title'));

        return ' "'.$post->title.'".';
    }
}
