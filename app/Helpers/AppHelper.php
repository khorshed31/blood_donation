<?php

function isMember()
{

    return auth()->id() == 1 ? true : optional(auth()->user())->role == 'member';
}

function isManager()
{

    return auth()->id() == 1 ? true : optional(auth()->user())->role == 'manager';
}

function isAdmin()
{

    return auth()->id() == 1 ? true : optional(auth()->user())->role == 'admin';
}
