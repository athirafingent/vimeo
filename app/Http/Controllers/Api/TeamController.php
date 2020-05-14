<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function listTeams()
    {
    	try{
            $teams = Team::with(['team_created_by' => function($q1){
				                        $q1->select('id', 'name', 'email');
				                    }, 'team_updated_by' => function($q2){
				                        $q2->select('id', 'name', 'email');
				                    }, 'team_users.user' => function($q3){
				                        $q3->select('id', 'name', 'email');
				                    }
				                ])->get();

            if($teams->isNotEmpty()) {
            	$users = [];
                $teams = $teams->map(function ($team) use($users) {
                	$team_user_count = count($team->team_users);
                	for ($i=0; $i < $team_user_count; $i++) { 
                		$users[] = $team->team_users[$i]['user'];
                	}
                	unset($team->team_users);
                	$team['team_users'] = $users;
                    return $team;
                });
                return response()->json(['code' => 200, 'teams' => $teams, 'message' => 'success'], 200);
            } else {
            	return response()->json(['code' => 400, 'message' => "No teams available"], 400);
            }
            
        } catch(\Exception $e) {
            return response()->json(['code' => 500, 'message' => $e->getMessage()], 500);
        }
    }
}
