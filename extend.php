<?php

/*
 * This file is part of katosdev/reply2see.
 *
 * Copyright (c) 2021
 * Updated by KatosDev
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace katosdev\Reply2See;

use Flarum\Extend;
use Flarum\Extend\Formatter;
use Illuminate\Contracts\Events\Dispatcher;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/resources/less/forum.less'),
    (new Extend\Formatter)
	    ->configure(function (Configurator $config) {
	        $config->BBcodes->addCustom(
	            '[REPLY]{TEXT}[/REPLY]',
	            '<reply2see>{TEXT}</reply2see>'
	        );
   		 }),
    new Extend\Locales(__DIR__ . '/resources/locale'),

	(new Extend\Event())
	->subscribe(Listeners\LoadSettingsFromDatabase::class),

];
