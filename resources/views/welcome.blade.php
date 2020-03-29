@extends('layouts.app')
@section('content')

<label for="dormitory_for_search" class="product-info">Общежитие</label>
<select class="product-info" name="dormitory_for_search" id="dormitory_for_search">
  <option>Все</option>
  <option>1-е общежитие</option>
  <option>2-е общежитие</option>
  <option>3-е общежитие</option>
</select>
<label for="floor_for_search" class="product-info">Этаж</label>
<select class="product-info" name="floor_for_search" id="floor_for_search">
  <option>Все</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
</select>
<label for="free_for_search" class="product-info">Свободные места</label>
<select class="product-info" name="free_for_search" id="free_for_search">
  <option>Все</option>
  <option>0</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
</select>
<button type="button" id="searchroom_button" style="margin-left: 200px;" class="object1-button">Поиск</button>
<div style="font-size: 16px;">
  <label id="indicator"></label>
<table class="table table-bordered table-striped" >
            <thead class="thead-dark">
                <tr>
                  <th><label class='lab'>Номер</label></th>
                  <th><label class='lab'>Площадь</label></th>
                   <th><label class='lab'>Количество мест</label></th>
                   <th><label class='lab'>Этаж</label></th>
                   <th><label class='lab'>Общежитие</label></th>
                   <th><label class='lab'>Занятые места</label></th>
                   <th><label class='lab'>Свободные места</label></th>     
                </tr>
            </thead>
            <tbody id="searchroom_result">
              
            </tbody>
        </table>
     </div>

@endsection