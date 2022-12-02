<?php

namespace App\Listeners;
//musavand#t4
use App\Models\TableA;
use App\Models\TableB;
use App\Events\TableAAddedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTableA_AddedNotifications
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TableAAddedEvent  $event
     * @return void
     */
    public function handle(TableAAddedEvent $event)
    {
        // foreach (User::whereNot('id', $event->chirp->user_id)->cursor() as $user) {
        //     $user->notify(new NewChirp($event->chirp));
        // }
        $tableA_Id=$event->table_a->id;
        $tableA_UserStar=$event->table_a->user_star;
        if($tableA_Id)
        {
            $data=TableB::where('table_a_id',$tableA_Id)->first();
            
            if ($data)
            {
                $id=$data->id;
                $tableB_UserStar=$data->star_count;
                $data->star_count = $tableB_UserStar+$tableA_UserStar;
                $data->refresh();
            }
            else
            {
                TableB::create(['table_a_id' => $tableA_Id,
                                'star_count'=>  $tableA_UserStar                
            ]);
            }
        }
    }
}
