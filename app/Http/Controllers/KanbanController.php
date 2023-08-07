<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use App\Models\KanbanCard;
use App\Models\KanbanColumn;
use Illuminate\Http\Request;
use App\Notifications\UpdateKanban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class KanbanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
       $kanban = Kanban::find($id);
       $todo = [];
       $working = [];
       $done = [];

      if($kanban != null){
        $todo = $kanban->columns[0]->cards;
        $working = $kanban->columns[1]->cards;
        $done = $kanban->columns[2]->cards;
      }


        return view('kanban',compact('kanban','todo','working','done'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $user = Auth::user();
         Notification::send($user, new UpdateKanban());

        if($request->Title == null){
            return redirect()->back();
        }

        $title = $request->Title;
        $kanban_id = $request->kanban;
        $description = null;
        if ($request->Description == null){
            $description = "";
        }else{
            $description = $request->Description;
        }

       

       $kanban = Kanban::find($kanban_id);
       $columnsTodo = $kanban->columns[0];

       $newCard = new KanbanCard();
       $newCard->title = $title;
       $newCard->description = $description;
       $newCard->kanban_column_id = $columnsTodo->id;
       $newCard->save();

       


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Kanban $kanban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Kanban $kanban)
    {
        //
        $card = KanbanCard::where("id",$request->card_id)
        ->update([
            "title" => $request->title,
            "description" => $request->description
        ]);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kanban $kanban)
    {
        //

        $card = KanbanCard::find($request->card_id);
        $column = KanbanColumn::where("name",$request->column_name)->first();

        $card->update([
            "kanban_column_id" => $column->id
        ]);

        
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //

        $card = KanbanCard::where("id",$request->card);
       $card->delete();
        return redirect()->back();
    }

}
