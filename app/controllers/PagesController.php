<?php

class PagesController extends BaseController {
    public function home() {
        $name = 'Aleksandr';
        return View::make('hello')->with('name', $name);
        //return 'hello';
    }
}