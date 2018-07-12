<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketFormRequest;
use App\Models\Ticket;

class TicketController extends Controller
{
    private $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->modelTicket = $ticket;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = $this->modelTicket->getAllTicket();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketFormRequest $request)
    {
        $data = $request->all();
        $newTicket = $this->modelTicket->createTicket($data);

        return redirect()->route('tickets.index')->with('data_store', $newTicket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectedTicket = $this->modelTicket->showTicket($id);
        $comments = $selectedTicket->comments()->get();
        return view('tickets.show', compact('selectedTicket', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedTicket = $this->modelTicket->showTicket($id);
        return view('tickets.edit', compact(
            'selectedTicket'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TicketFormRequest $request, $id)
    {
        $data = $request->all();

        if ($request->get('status') != null) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        $updatedTicket = $this->modelTicket->updateTicket($id, $data);

        return redirect()->route('tickets.show', $id)->with('data_update', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedTicket = $this->modelTicket->deleteTicket($id);
        return redirect()->route('tickets.index', $id)->with('data_delete', $id);
    }
}
