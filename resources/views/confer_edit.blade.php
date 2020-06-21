@include('layouts.header')
@include('layouts.app')


<link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>

body{


        background:  url('{{URL::asset('img')}}/wall2.jpg')  no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
}

.layer1
{


}

.img-top
{
width:50%; height: 50% ;    display: block;
    margin-left: auto;
    margin-right: auto

}

.name {
    font-family: 'Montserrat', sans-serif;
    font-size: 24pt;
    text-shadow: 1px 1px 2px rgb(104, 82, 82), 0 0 1em red; 
}


</style>
<body   style = " no-repeat center center fixed;">
@foreach ($conference_list as $list)    





<div class="layer1 ">
    <p > <img class="img-top" src="{{URL::asset('storage')}}/{{ $list->photo_link }}" alt="Card" > </p>
</div>


<div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col-6">
<p class = "name">{{ $list->conference_name }}</p>
Дата проведения : <b><p>{{ $list->date }}</p></b>
Место встречи: <b><p>{{ $list->venue }}</p></b> 
      </div>
      <div class="col">
      </div>
    </div>
</div>

<hr>



      @foreach ($comments as $comment)    

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
  
    </div>
    <div class="col-md-auto">
      <table style=   cellpadding="4"  >
          <td style= "align:left;" width = 300>  {{ $comment->name }}    </td>      
          <td style= "align:left;" width = 500>  {{ $comment->comment }}       </td>
      </table>
    </div>
    <div class="col col-lg-2">

    </div>
  </div>

</div>

<br>













@endforeach 


<hr>
<div class="container">
    <div class="row">
      <div class="col">
      </div>
      <div class="col-6">

        <form id="submit_coment" action="{{ route('coment_submit') }}" method="POST">
            @csrf   
            <input type="hidden" name="id"          value="{{ $list->id }}"> 
 
            <div class="form-group">
                <label for="exampleFormControlInput1">Представьтесь пожалуйста</label>
                <input type="text" name="name" class="form-control" id="inp1" placeholder="Пупкин">
              </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Email адрес</label>
              <input type="email" name = "email" class="form-control" id="inp2" placeholder="name@example.com">
            </div>


            <div class="form-group">
              <label for="exampleFormControlTextarea1">Комментарий</label>
              <textarea class="form-control" name ="comment" id="Textarea1" rows="3"></textarea>
            </div>

            <button type="submit" name="butt_coment"   class="btn btn-info">Добавить комментарий</button>

        </form>

      </div>
      <div class="col">
      </div>
    </div>
</div>





@endforeach 
</body>
@include('layouts.footer')

