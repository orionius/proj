@include('layouts.header')
@include('layouts.app')

<style>


body
{

    background:  url('{{URL::asset('img')}}/wall2.jpg')  no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;

}


</style>

<body>
   
 


    <table width="100%" border="1" cellspacing="0">
    <tr>
            <th><p class='text-center'>№ конференции</p></th><th><p class='text-center'>Дата</p></th><th><p class='text-center'>Имя</p></th><th><p class='text-center'>email</p></th><th><p class='text-center'>Комментарий</p></th><th><p class='text-center'>Действие</p></th>
    </tr>

        
        @foreach ($comments as $comment)    

@if( $comment->allowed  == 1) 
    <tr style = "background-color : Aquamarine">

@endif

     <td class='text-center'>{{ $comment->id_confer }}  </td> 
     
     <td>{{ Date::parse($comment->created_at)->format('j F Y г.') }} </td> 
     
     <td>{{ $comment->name }}  </td> 
     <td>{{ $comment->email }}  </td> 
     <td>{{ $comment->comment }}  </td> 
     
    <td class='text-center'>
         <div>
            <form method="POST" action="{{route('admin_commentdelallow')}}" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <input type="hidden" name="id"          value="{{ $comment->id }}">  
            <button type="submit"  name ="allow" value ="10"  class="btn btn-success">Разрешить</button>     
            <button type="submit"  name ="del" value ="10" class="btn btn-danger">Удалить</button> 
            </form>
        </div>   
    </td>

    </tr>
 
        @endforeach 
</table>
<br>
<br>
<br>
<br>


    <table width="100%" border="1" cellpadding="4" cellspacing="0">
    <tr>
           <th><p class='text-center'>№</p></th> <th><p class='text-center'>Ссылка на фото</p></th><th><p class='text-center'>Название конференции</p></th><th><p class='text-center'>Дата</p></th><th><p class='text-center'>Место проведения</p></th><th><p class='text-center'>Действие</p></th>
    </tr>    
    @foreach ($conference_list as $list)    
    <tr></tr>
    <td width=100px >
    <p class='text-center'> {{ $list->id }} </p>
    </td>
   
     <td>{{ $list->photo_link }}  </td> 

     <td> {{ $list->conference_name }} 

     </td>


 

     <td>{{ Date::parse($list->dates)->format('j F Y г.') }} </td> 

     <td>{{ $list->venue }}  </td> 


    <form method="post" action="{{route('admin_delconfer')}}" enctype="multipart/form-data">
        {{ csrf_field() }} 
        <input type="hidden" name="id"          value="{{ $list->id }}">    
    <td class='text-center'>  <button type="submit" class="btn btn-danger"  >Удалить</button> </td>      
    </form>    


</tr>
        @endforeach 
</table>

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">



                <div class="card-header">Добавить новую конференцию</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="container">
                        <div class="row">
                          <div class="col-sm">

                <div style = "border='1'">    

                          <form method="post" action="{{route('admin_download')}}" enctype="multipart/form-data">
                            {{ csrf_field() }} 
                                <div class="form-group">
                                  <label for="exampleFormControlFile1">Загрузка картинки</label>
                                  <input type="file" name = "image" class="form-control-file" id="exampleFormControlFile1" >
<br>

                            </div>
                            <input id ="1" class="form-control form-control-lg" name = "topic_name"  type="text"  placeholder="Тема конференции">
                            <br>
                            <input id ="2" class="form-control" name = "start_date" type="date" placeholder="Дата проведения">
                            <br>
                            <input id ="3" class="form-control form-control-sm" name ="location" type="text" placeholder="Место проведения">
                            <br>
                            <button type="submit" class="btn btn-primary">Отправить</button>

                            </form>

                          </div>
                        </div>
                      </div>



                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>


</body>

@include('layouts.footer')