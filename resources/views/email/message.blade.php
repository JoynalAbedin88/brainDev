<div>
    <div style="text-align: center; background: #ddd; padding: 2px">
        <h1>{{ env('APP_NAME') }}</h1>
    </div>
    <h2 style="margin-bottom: 10px">{{ $request->name }}</h2>
    <h3>
        {{ $request->email }} <br>
        {{ $request->phone }} <br>
        {{ $request->company}}
    </h3>
    <p>{{ $request->message }}</p>
</div>