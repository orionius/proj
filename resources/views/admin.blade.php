@include('layouts.header')
@include('layouts.app')

<style>
td
{

    align:center;

}

</style>

<body>
   
 


    <table width="100%" border="1" cellpadding="4" cellspacing="0">
    <tr>
            <th><p class='text-center'>Id</p></th><th><p class='text-center'>Дата</p></th><th><p class='text-center'>Имя</p></th><th><p class='text-center'>email</p></th><th><p class='text-center'>Комментарий</p></th><th><p class='text-center'>Действие</p></th>
    </tr>

        
        @foreach ($comments as $comment)    
    <tr></tr>

     <td>{{ $comment->id }}  </td> 
     <td>{{ $comment->created_at->format('d.m.Y') }}  </td> 
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
    <td width=100px >
    <p > {{ $list->photo_link }} </p>
    </td>
   
     <td>{{ $list->id }}  </td> 

     <td> {{ $list->conference_name }} 

     </td>


 
     <td>{{ $list->date }}  </td> 
     <td>{{ $list->venue }}  </td> 


     <td><button type="button" class="btn btn-success">Разрешить</button>      
     <button type="button" class="btn btn-danger">Удалить</button> </td>      
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

                            <form>
                                <div class="form-group">
                                  <label for="exampleFormControlFile1">Загрузка картинки</label>
                                  <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </form>


                            <input class="form-control form-control-lg" type="text" placeholder="Тема конференции">
                            <br>
                            <input class="form-control" type="date" placeholder="Дата проведения">
                            <br>
                            <input class="form-control form-control-sm" type="text" placeholder="Место проведения">
                           

                          </div>
                        </div>
                      </div>



                </div>
            </div>
        </div>
    </div>
</div>




</body>

