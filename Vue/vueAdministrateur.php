<?php $this->titre = "Administrateur"; ?>

<article>
    <header>

<h2 class="text-center">{{ block('title') }}</h2>
{% for flashMessage in app.session.flashbag.get('success') %}
<div class="alert alert-success">
    {{ flashMessage }}
</div>
{% endfor %}
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#articles" data-toggle="tab">Billets</a></li>
            <li><a href="#comments" data-toggle="tab">Commentaires</a></li>
            <li><a href="#users" data-toggle="tab">Users</a></li>
        </ul>
    </div>
</div>
<div class="tab-content">
    <div class="tab-pane fade in active adminTable" id="articles">
        {% if articles %}
        <div class="table-responsive">
            <table class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th></th>  <!-- Actions column -->
                </tr>
                </thead>
                {% for article in articles %}
                <tr>
                    <td><a class="articleTitle" href="{{ path('article', { 'id': article.id }) }}">{{ article.title }}</a></td>
                    <td>{{ article.content | truncate(60) }}</td>
                    <td>
                        <a href="{{ path('admin_article_edit', { 'id': article.id }) }}" class="btn btn-info btn-xs" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                        <button type="button" class="btn btn-danger btn-xs" title="Delete" data-toggle="modal" data-target="#articleDialog{{ article.id }}"><span class="glyphicon glyphicon-remove"></span>
                        </button>
                        <div class="modal fade" id="articleDialog{{ article.id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous vraiment supprimer cet épisode ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <a href="{{ path('admin_article_delete', { 'id': article.id }) }}" class="btn btn-danger">Confirm</a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </td>
                </tr>
                {% endfor %}
            </table>
        </div>
        {% else %}
        <div class="alert alert-warning">No articles found.</div>
        {% endif %}
        <a href="{{ path('admin_article_add') }}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Ecrire un épisode</button></a>
    </div>
    <div class="tab-pane fade adminTable" id="comments">
        <!-- TODO Insérer ici le code de gestion des commentaires -->

    </div>
    <div class="tab-pane fade adminTable" id="users">
        <!-- TODO Insérer ici le code de gestion des utilisateurs -->

    </div>
</div>
{% endblock %}
