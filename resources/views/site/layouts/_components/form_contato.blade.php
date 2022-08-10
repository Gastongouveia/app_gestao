{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" value="{{ old('nome') }}" placeholder="Nome" class="{{ $class }}">
    <br>
    <input name="telefone" type="text" value="{{ old('telefone') }}" placeholder="Telefone" class="{{ $class }}">
    <br>
    <input name="email" type="text" value="{{ old('email') }}" placeholder="E-mail" class="{{ $class }}">
    <br>
    <select name="motivo_contato" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato }}" {{ old('motivo_contato') == $motivo_contato ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $class }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>

<div style="position:absolute"></div>
