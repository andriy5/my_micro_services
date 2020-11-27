<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller {
  /**
   * Create a message
   * 
   * @param Request @request
   * @return Response
   */
  public function create(Request $request) {
    $this->validate($request, [
      'content' => 'required|string',
      'id_sender' => 'required|integer',
      'id_receiver' => 'required|integer',
      'discussion_id' => 'required|integer'
    ]);

    try {

      $message = new Message;
      $message->content = $request->input('content');
      $message->id_sender = $request->input('id_sender');
      $message->id_receiver = $request->input('id_receiver');
      $message->discussion_id = $request->input('discussion_id');

      $message->save();

      return response()->json(['message' => $message, 'message' => 'Message Created!'], 201);

    } catch (\Exception $e) {
      return response()->json(['message' => 'Message Creation Failed!'], 409);
    }
  }

  /**
   * Get a message
   * 
   * @param Request $request
   * @return Response
   */
  public function showOne(Request $request) {
    $this->validate($request, [
      'id' => 'required|integer'
    ]);

    $id = $request->input('id');

    return response()->json(Message::find($id));
  }

  /**
   * Get all messages
   * 
   * @return Response 
   */
  public function showAll() {
    return response()->json(Message::all());
  }

  /**
   * Update a message
   * 
   * @param Request $request
   * @return Response
   */
  public function update(Request $request) {
    $this->validate($request, [
      'id' => 'required|integer',
      'content' => 'required|string'
    ]);

    $message = Message::findOrFail($request->input('id'));

    $message->update($request->all());

    return response()->json($message, 200);
  }

  /**
   * Delete a message
   * 
   * @param Request $request
   * @return Response
   */
  public function delete(Request $request) {
    Message::findOrFail($request->input('id'))->delete();

    return response('Deleted Succesfully', 200);
  }
}