<?php
namespace App\View\Helper;

use Cake\Http\Session;
use Cake\View\Helper;

class SessionHelper extends Helper
{

    public function read(string $value) {
        $session = new Session();
        return $session->read($value);
    }

    public function addToChart($mod){
        $session = new Session();
        $session->write('cart', $mod);
        $this->Flash->success('Added to cart !');
    }

    public function removeFromChart($value){
        $session = new Session();
        $session->delete('cart.'.$value);
        $this->Flash->success('Removed from cart !');
    }
}