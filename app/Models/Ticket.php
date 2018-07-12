<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'content', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function getAllTicket() {
        return Ticket::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param array $data
     * @return Ticket
     */
    public function createTicket(array $data) {
        return Ticket::create($data);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showTicket(int $id) {
        return Ticket::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Ticket
     */
    public function updateTicket(int $id, array $data) {
        $ticket = Ticket::find($id);
        return $ticket->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTicket($id)
    {
        $ticket = Ticket::find($id);
        return $ticket->delete();
    }
}
