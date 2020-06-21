@include('layouts.header')
@include('layouts.app')


<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,800&display=swap');

body {
    background: rgb(105, 165, 173); 
}

.layer1 {
    float: left; 
    background: rgb(52, 189, 207); 
    border: 1px solid black; 
    padding: 10px; 
    margin-right: 20px; 
    display: inline-block;
    width:200;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
   }
.name {
    font-family: 'Montserrat', sans-serif;
    text-shadow: 1px 1px 2px rgb(104, 82, 82), 0 0 1em red; 
}






</style>







{{--   --}}

<body>

<table width="100%" border="1" cellpadding="4" cellspacing="0">
    <caption>Список конференций</caption>

@foreach ($conference_list as $list)         

@if (  $list->id   % 2  == 0) 

<tr style = 'background: linear-gradient(to top, #18476d, #0de8f0);'>
@else
<tr style = 'background: linear-gradient(to top, #0de8f0, #18476d);'>
@endif


    <td>
<div class="index_cat_txt">

<div class="index_cat_tit">
<p class = "name">{{ $list->conference_name }}</p>
</div>

        
<div class="layer1">
    <p style=" width:200px; height: 100px"> <img class="card-img-top" src="{{URL::asset('storage')}}/{{ $list->photo_link }}" alt="Card" > </p>
</div>

<div> 
<div class="index_cat_link"><p >Конференция состоится  {{ $list->dates  }} </p> 

<p> Место проведения </p>,                                  
<p class="ross_p">
    <b>{{ $list->venue }}</b>
                   </p>

                <form id="submit" action="{{ route('confer_submit') }}" method="POST">
                    @csrf   
                    <input type="hidden" name="id"          value="{{ $list->id }}"> 
                   <div style = '  width:100%; text-align: right;  display: inline-block; ' >    
                          <button name ='edit' type="submit" class="btn btn-info"   value='5'  >Войти</button> </div>
           </form>
       
            </div>
</div>
</td>
</tr>

{{--


--}}
@endforeach 

</table>
</body>
@include('layouts.footer')

