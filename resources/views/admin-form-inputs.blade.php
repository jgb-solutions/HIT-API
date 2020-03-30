<div class="row">
    <div class="form-group col-6">
        <label for="date">Date et Heure</label>
        <input type="datetime-local"
               required
               class="form-control"
               id="date"
               name="date"
               placeholder="Entrer la date et l'heure"
               value="{{!empty($n) ? \Carbon\Carbon::parse($n->date)->format('Y-m-d\TH:i') : \Carbon\Carbon::now()->format('Y-m-d\TH:i')}}">
    </div>
    <div class="form-group col-6">
        <label for="image">Choisir Image</label>
        <input type="file"
               accept="image/*"
               class="form-control"
               id="image"
               name="image"
               placeholder="Choisir une image"
               value="{{!empty($n) ? $n->image : old('image')}}">
    </div>
    <div class="form-group col-12">
        <label for="title">Titre</label>
        <input type="text"
               required
               class="form-control"
               id="title"
               name="title"
               placeholder="Entrer le titre"
               value="{{!empty($n) ? $n->title : old('title')}}">
    </div>

    <div class="form-group col-12">
        <label for="video_url">Lien YouTube</label>
        <input type="url"
               class="form-control"
               id="video_url"
               name="video_url"
               placeholder="Entrer le lien YouTube"
               value="{{!empty($n) && !empty($n->video_id) ? 'https://www.youtube.com/watch?v=' . $n->video_id : ''}}">
    </div>

    <div class="form-group col-12">
        <label for="body">Contenu</label>
        <textarea class="form-control summernote"
                  required
                  id="body" rows="3"
                  name="body">{{!empty($n) ? $n->body : old('body')}}</textarea>
    </div>

    <div class="form-group col-12">
        <label for="ads">Publicité</label>
        <textarea class="form-control summernote"
                  id="ads" rows="3"
                  name="ads">{{!empty($n) ? $n->ads : old('ads')}}</textarea>
    </div>

    @if(isset($checkbox))
        <div class="form-group col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="shouldNotify" name="shouldNotify">
                <label class="form-check-label" for="shouldNotify">
                   Notifier
                </label>
            </div>
        </div>
    @endif
</div>
