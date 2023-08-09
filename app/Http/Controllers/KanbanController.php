<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use App\Models\KanbanCard;
use App\Models\KanbanColumn;
use Illuminate\Http\Request;
use App\Notifications\UpdateKanban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

use App\Interfaces\KanbanCardRepositoryInterface;
use App\Interfaces\KanbanColumnsRepositoryInterface;
use App\Interfaces\KanbanRepositoryInterface;

class KanbanController extends Controller
{

    private KanbanRepositoryInterface $kanbanRepository;
    private KanbanColumnsRepositoryInterface $kanbanColumnRepository;
    private KanbanCardRepositoryInterface $kanbanCardRepository;

    public function __construct(KanbanRepositoryInterface $kanbanRepository,KanbanColumnsRepositoryInterface $kanbanColumnRepository,KanbanCardRepositoryInterface $kanbanCardRepository)
    {
        $this->kanbanRepository = $kanbanRepository;
        $this->kanbanColumnRepository = $kanbanColumnRepository;
        $this->kanbanCardRepository = $kanbanCardRepository;
    }
   

    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        //
       $kanban = $this->kanbanRepository->findById($id);
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
        // validate
        $validated = $request->validate([
            'Title' => 'required',
            'kanban' => 'required',
            'Description' => 'required',
        ]);
    
      

        $title = $request->Title;
        $kanban_id = $request->kanban;
        $description = $request->Description;
      

        // Notification
        $user = Auth::user();
        Notification::send($user, new UpdateKanban());

        // create card
       $kanban = $this->kanbanRepository->findById($kanban_id);
       $columnsTodo = $kanban->columns[0];
       $this->kanbanCardRepository->createCard($columnsTodo,$title,$description,$user);
       


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

        // validate
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'card_id' => 'required',
        ]);

        // edit card
        $card = $this->kanbanCardRepository->findById($request->card_id);
        $this->kanbanCardRepository->editCard($request->title,$request->description,$card);
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kanban $kanban)
    {
        // validate

        $validated = $request->validate([
            'card_id' => 'required',
            'column_name' => 'required',
        ]);
    
        $card = $this->kanbanCardRepository->findById($request->card_id);
        $column = $this->kanbanColumnRepository->findByName($request->column_name);
        $this->kanbanCardRepository->updateColumn($card,$column);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // validate
        $validated = $request->validate([
            'card' => 'required',
        ]);

        $this->kanbanCardRepository->deleteCard($request->card);
        return redirect()->back();
    }

}
