<?php

declare(strict_types=1);

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Mail\Mailable;

arch()->preset()->php();
arch()->preset()->laravel();
arch()->preset()->security();

arch()
    ->expect('App')
    ->toHaveMethodsDocumented()
    ->toHavePropertiesDocumented()
    ->toUseStrictEquality()
    ->toUseStrictTypes();

arch()
    ->expect('App\Console\Client')
    ->toBeClasses()
    ->toBeReadonly()
    ->toBeInvokable();

arch()
    ->expect('App\Events')
    ->classes()
    ->toBeReadonly()
    ->toHaveSuffix('Event');

arch()
    ->expect('App\Http\Controllers')
    ->classes()
    ->toBeFinal()
    ->ignoring(Controller::class);

arch()
    ->expect('App\Http\Requests')
    ->classes()
    ->toBeFinal();

arch()
    ->expect('App\Http\Resources')
    ->classes()
    ->toBeFinal();

arch()
    ->expect('App\Jobs\Checks')
    ->toHaveSuffix('Check');

arch()
    ->expect('App\Listeners')
    ->classes()
    ->toHaveSuffix('Listener');

arch()
    ->expect('App\Mail')
    ->classes()
    ->toHaveSuffix('Mail')
    ->toExtend(Mailable::class);

arch()
    ->expect('App\Models')
    ->toBeClasses()
    ->toUseTrait(HasFactory::class);

arch()
    ->expect('App\Objects')
    ->toBeClasses()
    ->toBeReadonly()
    ->toImplement(Arrayable::class)
    ->toImplement(JsonSerializable::class);

arch()
    ->expect('App\Repositories')
    ->toBeClasses()
    ->toBeReadonly()
    ->toHaveSuffix('Repository');

arch()
    ->expect('App\Services')
    ->toBeClasses()
    ->toHaveSuffix('Service');
