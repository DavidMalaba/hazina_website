@extends('errors.layout')
@php $title = 'Erreur serveur'; @endphp
@section('code', '500')
@section('message', 'Erreur interne du serveur')
@section('description', 'Oups, quelque chose s\'est mal passé de notre côté. Notre équipe technique a été informée de ce dysfonctionnement.')
