@extends('errors.layout')
@php $title = 'Interdit'; @endphp
@section('code', '403')
@section('message', 'Accès interdit')
@section('description', 'Désolé, vous n\'avez pas les permissions nécessaires pour accéder à cette ressource.')
