<?php

it('shows all requests on overview page', function () {
    $this->get('/incoming-requests')
        ->assertOk()
        ->assertSee('/incoming-requests');
});
