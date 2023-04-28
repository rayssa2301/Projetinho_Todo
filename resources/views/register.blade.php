<x-layout page="Do it: Login">
  <x-slot:btn>
            <a href="{{route('home')}}" class="btn btn-primary">
                   Junte-se a nós
                </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Crie sua conta</h1>
        <form method="POST" action="{{route('user.register_action')}}">
            @csrf



             <x-form.text_input
             name="name"
             label="Seu nome"
            placeholder="Seu nome"
             />

             <x-form.text_input
             type="email"
             name="email"
             label="Seu email"
             placeholder="Seu email"
             />
               <x-form.text_input
             type="password"
             name="password"
             label="Sua senha"
             placeholder="Sua senha"
             />


            <x-form.form_button resetTxt="Limpar" submitTxt="Criar conta"  />

        </form>
    </section>

</x-layout>
