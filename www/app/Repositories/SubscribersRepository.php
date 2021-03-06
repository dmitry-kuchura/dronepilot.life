<?php

namespace App\Repositories;

use App\Models\Subscribers;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class SubscribersRepository
{
    public function list()
    {
        $model = Subscribers::orderBy('id', 'desc')->get();

        return $model;
    }

    public function create($request)
    {
        if (self::checkByIP(geoip()->getLocation()->ip) && self::checkByEmail($request['email'])) {
            try {
                $model = new Subscribers();

                $model->email = $request['email'];
                $model->status = Subscribers::STATUS_ACTIVE_SUBSCRIBER;
                $model->ip = geoip()->getLocation()->ip;
                $model->hash = Str::random(40);

                return $model->save();
            } catch (\Exception $exception) {
                Log::error($exception->getMessage() . ' -> ' . $exception->getFile() . ' -> ' . $exception->getLine());
            }
        } else {
            return false;
        }
    }

    public function unsubscribe($hash)
    {
        /* @var $model Subscribers */
        $model = Subscribers::where('hash', $hash)->first();

        $model->status = Subscribers::STATUS_DISABLE_SUBSCRIBER;
        $model->unsubscribe_at = Carbon::now()->format('Y-m-d H:i:s');

        return $model->save();
    }

    public function changeStatus($ID)
    {
        /* @var $model Subscribers */
        $model = Subscribers::find($ID);

        $model->status = $model->status === Subscribers::STATUS_ACTIVE_SUBSCRIBER ? Subscribers::STATUS_DISABLE_SUBSCRIBER : Subscribers::STATUS_ACTIVE_SUBSCRIBER;

        return $model->save();
    }

    public function destroy($ID)
    {
        return Subscribers::destroy($ID);
    }

    public function checkByIP($ip)
    {
        $model = Subscribers::where('ip', $ip)->orderby('id', 'desc')->first();

        return is_null($model) || Carbon::now()->diffInMinutes(Carbon::parse($model->created_at)) > 15;
    }

    public function checkByEmail($email)
    {
        $model = Subscribers::where('email', $email)->orderby('id', 'desc')->first();

        return is_null($model);
    }
}
