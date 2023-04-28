<x-layout page="Do it: Login">
  <x-slot:btn>
            <a href="{{route('home')}}" class="btn btn-primary">
                   Voltar
                </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Criar Tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">
            @csrf
             <x-form.text_input name="title"
             label="Nome da tarefa"
             placeholder="Digite o título da tarefa"/>

             <x-form.text_input type="datetime-local"
             name="due_date"
             label="Data de Realização"/>

             <x-form.select_input
             name="category_id"
             label="Categoria">
             placeholder="Selecione a categoria">

             @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->title}}</option>
                 @endforeach


             </x-form.select_input>

             <x-form.textarea_input
             name="description"
             label="Descrição"
             placeholder="Digite a descrição da tarefa"/>


            <x-form.form_button submitTxt="Criar Tarefa" resetTxt="Limpar" />

        </form>
    </section>
</x-layout>
