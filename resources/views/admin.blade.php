@include('layouts.header')
@include('layouts.app')

<body>
   

    <table width="100%" border="1" cellpadding="4" cellspacing="0">
    <tr>
            <th><p class='text-center'>Id</p></th><th><p class='text-center'>Дата</p></th><th><p class='text-center'>Имя</p></th><th><p class='text-center'>email</p></th><th><p class='text-center'>Комментарий</p></th><th><p class='text-center'>Действие</p></th>
    </tr>

        
        @foreach ($comments as $comment)    
    <tr></tr>
     <td>{{ $comment->id }}  </td> 
     <td>{{ $comment->date }}  </td> 
     <td>{{ $comment->name }}  </td> 
     <td>{{ $comment->email }}  </td> 
     <td>{{ $comment->comment }}  </td> 
     <td><button type="button" class="btn btn-success">Разрешить</button>     
      <button type="button" class="btn btn-danger">Удалить</button> </td>      
    </tr>
        @endforeach 
</table>
<br>
<br>
<br>
<br>


    <table width="100%" border="1" cellpadding="4" cellspacing="0">
    <tr>
           <th><p class='text-center'>Фото</p></th> <th><p class='text-center'>Id</p></th><th><p class='text-center'>Название конференции</p></th><th><p class='text-center'>Дата</p></th><th><p class='text-center'>Место проведения</p></th><th><p class='text-center'>Действие</p></th>
    </tr>    
    @foreach ($conference_list as $list)    
    <tr></tr>
    <td>
    <p > <img width = 100px height=100px class="img-top" src="{{URL::asset('img')}}/{{ $list->photo_link }}" alt="Card" > </p>
    </td>
   
     <td>{{ $list->id }}  </td> 

     <td>
        <div class="form-group">

            <input type="text" class="form-control" id="conference_name"  placeholder="{{ $list->conference_name }} ">
          </div>
     </td>


 
     <td>{{ $list->date }}  </td> 
     <td>{{ $list->venue }}  </td> 


     <td><button type="button" class="btn btn-success">Разрешить</button>      
     <button type="button" class="btn btn-danger">Удалить</button> </td>      
    </tr>
        @endforeach 
</table>
</body>

