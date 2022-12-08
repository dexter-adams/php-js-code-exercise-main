<?php
/**
 * Message controller calls methods from our App class.
 */

namespace App\Controllers;

class MessageController extends App {
    public function __construct() {
        // TBD
    }

    public function get( $messageId ) {
        $dummy_data = require_once( '../../public/message.json' );
        $res        = json_encode( $dummy_data );

        if ( $messageId ) {
            $res = $this->request( '/api/message', 'GET', [ 'id' => $messageId ] );
        }

        return json_encode( $res );
    }

    public function post( $messageData ) {
        $res = $this->request( '/api/message', 'POST', $messageData );

        return json_encode( $res );
    }

    public function update( $messageData ) {
        $res = $this->request( '/api/message', 'PUT', $messageData );

        return json_encode( $res );
    }

    public function delete( $messageId ) {
        $res = $this->request( '/api/message', 'DELETE', [ 'id' => $messageId ] );

        return $res->id ? : false;
    }
}
