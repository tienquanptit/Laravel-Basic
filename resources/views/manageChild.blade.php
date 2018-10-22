<?php
/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 06/10/2018
 * Time: 21:25
 */
?>
<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->title }}
            @if(count($child->childs))
                @include('manageChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
