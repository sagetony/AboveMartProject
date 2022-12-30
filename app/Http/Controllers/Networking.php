<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Networking extends Controller
{
    public function networking()
    {
        $datasponsor = DB::table('users')
            ->where('sponsor', auth()->user()->sponsor)
            ->first();
        $data = DB::table('users')
            ->where('sponsor', auth()->user()->sponsor)
            ->first();
        if ($datasponsor == null) {
            if (
                User::where('sponsor', auth()->user()->sponsor)->exists() &&
                auth()->user()->sponsor != 'Admin'
            ) {
                DB::table('users')
                    ->where('userId', auth()->user()->userId)
                    ->update([
                        'uplineOne' => $data->sponsor,
                    ]);
                $dataUplineTwo = DB::table('users')
                    ->where('mySponsorId', $data->sponsor)
                    ->first();
                if (
                    User::where('sponsor', $dataUplineTwo->sponsor)->exists() &&
                    $dataUplineTwo->sponsor != 'Admin'
                ) {
                    DB::table('users')
                        ->where('userId', auth()->user()->userId)
                        ->update([
                            'uplineTwo' => $dataUplineTwo->sponsor,
                        ]);
                    $dataUplineThree = DB::table('users')
                        ->where('mySponsorId', $dataUplineTwo->sponsor)
                        ->first();
                    if (
                        User::where('sponsor', $dataUplineThree->sponsor)->exists() &&
                        $dataUplineThree->sponsor != 'Admin'
                    ) {
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update([
                                'uplineThree' => $dataUplineThree->sponsor,
                            ]);
                        $dataUplineFour = DB::table('users')
                            ->where('mySponsorId', $dataUplineThree->sponsor)
                            ->first();
                        if (
                            User::where('sponsor', $dataUplineFour->sponsor)->exists() &&
                            $dataUplineFour->sponsor != 'Admin'
                        ) {
                            DB::table('users')
                                ->where('userId', auth()->user()->userId)
                                ->update([
                                    'uplineFour' => $dataUplineFour->sponsor,
                                ]);
                            $dataUplineFive = DB::table('users')
                                ->where('mySponsorId', $dataUplineFour->sponsor)
                                ->first();
                            if (
                                User::where('sponsor', $dataUplineFive->sponsor)->exists() &&
                                $dataUplineFive->sponsor != 'Admin'
                            ) {
                                DB::table('users')
                                    ->where('userId', auth()->user()->userId)
                                    ->update([
                                        'uplineFive' => $dataUplineFive->sponsor,
                                    ]);
                                $dataUplineSix = DB::table('users')
                                    ->where('mySponsorId', $dataUplineFive->sponsor)
                                    ->first();
                                if (
                                    User::where('sponsor', $dataUplineSix->sponsor)->exists() &&
                                    $dataUplineSix->sponsor != 'Admin'
                                ) {
                                    DB::table('users')
                                        ->where('userId', auth()->user()->userId)
                                        ->update([
                                            'uplineFive' => $dataUplineSix->sponsor,
                                        ]);
                                    $dataUplineSeven = DB::table('users')
                                        ->where('mySponsorId', $dataUplineSix->sponsor)
                                        ->first();
                                    if (
                                        User::where(
                                            'sponsor',
                                            $dataUplineSeven->sponsor
                                        )->exists() &&
                                        $dataUplineSeven->sponsor != 'Admin'
                                    ) {
                                        DB::table('users')
                                            ->where('userId', auth()->user()->userId)
                                            ->update([
                                                'uplineFive' => $dataUplineSeven->sponsor,
                                            ]);
                                        return redirect()->route('dashboard');
                                    } else {
                                        return redirect()->route('dashboard');
                                    }
                                } else {
                                    return redirect()->route('dashboard');
                                }
                            } else {
                                return redirect()->route('dashboard');
                            }
                        } else {
                            return redirect()->route('dashboard');
                        }
                    } else {
                        return redirect()->route('dashboard');
                    }
                } else {
                    return redirect()->route('dashboard');
                }
            } else {
                // We are next
                return redirect()->route('dashboard');
            }
        } else {
            $data = DB::table('users')
                ->where('sponsor', auth()->user()->sponsor)
                ->first();
            if (
                User::where('sponsor', auth()->user()->sponsor)->exists() &&
                auth()->user()->sponsor != 'Admin'
            ) {
                DB::table('users')
                    ->where('userId', auth()->user()->userId)
                    ->update([
                        'uplineOne' => $data->sponsor,
                    ]);
                $dataUplineTwo = DB::table('users')
                    ->where('mySponsorId', $data->sponsor)
                    ->first();
                if (
                    User::where('sponsor', $dataUplineTwo->sponsor)->exists() &&
                    $dataUplineTwo->sponsor != 'Admin'
                ) {
                    DB::table('users')
                        ->where('userId', auth()->user()->userId)
                        ->update([
                            'uplineTwo' => $dataUplineTwo->sponsor,
                        ]);
                    $dataUplineThree = DB::table('users')
                        ->where('mySponsorId', $dataUplineTwo->sponsor)
                        ->first();
                    if (
                        User::where('sponsor', $dataUplineThree->sponsor)->exists() &&
                        $dataUplineThree->sponsor != 'Admin'
                    ) {
                        DB::table('users')
                            ->where('userId', auth()->user()->userId)
                            ->update([
                                'uplineThree' => $dataUplineThree->sponsor,
                            ]);
                        $dataUplineFour = DB::table('users')
                            ->where('mySponsorId', $dataUplineThree->sponsor)
                            ->first();
                        if (
                            User::where('sponsor', $dataUplineFour->sponsor)->exists() &&
                            $dataUplineFour->sponsor != 'Admin'
                        ) {
                            DB::table('users')
                                ->where('userId', auth()->user()->userId)
                                ->update([
                                    'uplineFour' => $dataUplineFour->sponsor,
                                ]);
                            $dataUplineFive = DB::table('users')
                                ->where('mySponsorId', $dataUplineFour->sponsor)
                                ->first();
                            if (
                                User::where('sponsor', $dataUplineFive->sponsor)->exists() &&
                                $dataUplineFive->sponsor != 'Admin'
                            ) {
                                DB::table('users')
                                    ->where('userId', auth()->user()->userId)
                                    ->update([
                                        'uplineFive' => $dataUplineFive->sponsor,
                                    ]);
                                $dataUplineSix = DB::table('users')
                                    ->where('mySponsorId', $dataUplineFive->sponsor)
                                    ->first();
                                if (
                                    User::where('sponsor', $dataUplineSix->sponsor)->exists() &&
                                    $dataUplineSix->sponsor != 'Admin'
                                ) {
                                    DB::table('users')
                                        ->where('userId', auth()->user()->userId)
                                        ->update([
                                            'uplineFive' => $dataUplineSix->sponsor,
                                        ]);
                                    $dataUplineSeven = DB::table('users')
                                        ->where('mySponsorId', $dataUplineSix->sponsor)
                                        ->first();
                                    if (
                                        User::where(
                                            'sponsor',
                                            $dataUplineSeven->sponsor
                                        )->exists() &&
                                        $dataUplineSeven->sponsor != 'Admin'
                                    ) {
                                        DB::table('users')
                                            ->where('userId', auth()->user()->userId)
                                            ->update([
                                                'uplineFive' => $dataUplineSeven->sponsor,
                                            ]);
                                        return redirect()->route('dashboard');
                                    } else {
                                        return redirect()->route('dashboard');
                                    }
                                } else {
                                    return redirect()->route('dashboard');
                                }
                            } else {
                                return redirect()->route('dashboard');
                            }
                        } else {
                            return redirect()->route('dashboard');
                        }
                    } else {
                        return redirect()->route('dashboard');
                    }
                } else {
                    return redirect()->route('dashboard');
                }
            } else {
                // We are next
                return redirect()->route('dashboard');
            }
        }
    }

    // public function downline()
    // {
    //     $datasponsor = DB::table('users')
    //         ->where('sponsor', auth()->user()->sponsor)
    //         ->first();

    //     if (
    //         User::where('sponsor', auth()->user()->sponsor)->exists() &&
    //         $datasponsor->downlineOne != 'Admin'
    //     ) {
    //         DB::table('users')
    //             ->where('mySponsorId', auth()->user()->sponsor)
    //             ->update(['downlineOne', auth()->user()->mySponsorId]);
    //     } elseif (
    //         User::where('sponsor', auth()->user()->sponsor)->exists() &&
    //         $datasponsor->downlineTwo != 'Admin'
    //     ) {
    //         DB::table('users')
    //             ->where('mySponsorId', auth()->user()->sponsor)
    //             ->update(['downlineTwo', auth()->user()->mySponsorId]);
    //     } elseif (
    //         User::where('sponsor', auth()->user()->sponsor)->exists() &&
    //         $datasponsor->downlineThree != 'Admin'
    //     ) {
    //         DB::table('users')
    //             ->where('mySponsorId', auth()->user()->sponsor)
    //             ->update(['downlineThree', auth()->user()->mySponsorId]);
    //     } elseif (
    //         User::where('sponsor', auth()->user()->sponsor)->exists() &&
    //         $datasponsor->downlineFour != 'Admin'
    //     ) {
    //         DB::table('users')
    //             ->where('mySponsorId', auth()->user()->sponsor)
    //             ->update(['downlineFour', auth()->user()->mySponsorId]);
    //     } elseif (
    //         User::where('sponsor', auth()->user()->sponsor)->exists() &&
    //         $datasponsor->downlineFive != 'Admin'
    //     ) {
    //         DB::table('users')
    //             ->where('mySponsorId', auth()->user()->sponsor)
    //             ->update(['downlineFive', auth()->user()->mySponsorId]);
    //     } elseif (
    //         User::where('sponsor', auth()->user()->sponsor)->exists() &&
    //         $datasponsor->downlineSeven != 'Admin'
    //     ) {
    //         DB::table('users')
    //             ->where('mySponsorId', auth()->user()->sponsor)
    //             ->update(['downlineSix', auth()->user()->mySponsorId]);
    //     } elseif (
    //         User::where('sponsor', auth()->user()->sponsor)->exists() &&
    //         $datasponsor->downlineSeven != 'Admin'
    //     ) {
    //     } else {
    //         DB::table('users')
    //             ->where('mySponsorId', auth()->user()->sponsor)
    //             ->update(['downlineSeven', auth()->user()->mySponsorId]);
    //     }
    // }
}
