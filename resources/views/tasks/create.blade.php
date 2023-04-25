<x-layout page="Do it: Login">
  <x-slot:btn>
            <a href="{{route('home')}}" class="btn btn-primary">
                   Voltar
                </a>
    </x-slot:btn>
    <section id="create_task_section">
        <h1>Criar tarefa</h1>
        <form>
             <x-form.text_input name="title" label="Nome da tarefa" placeholder="Digite o título da tarefa"/>
             <x-form.text_input type="date" name="due_date" label="Data de Realização"/>
             <x-form.select_input name="category" label="Categoria">
                <option>Estudos</option>
             </x-form.select_input>
             <x-form.textarea_input name="description" label="Descrição"
             placeholder="Digite a descrição da tarefa"/>


            <x-form.form_button submitTxt="Criar Tarefa" resetTxt="Limpar" />

        </form>
    </section>
</x-layout>
