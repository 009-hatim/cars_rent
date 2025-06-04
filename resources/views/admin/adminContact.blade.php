@extends('admin.admin')

@section('title', 'Messages des clients')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="text-primary"><i class="fas fa-envelope me-2"></i>Messages des clients</h1>
                
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Liste des messages reçus</h6>
               <span class="badge bg-primary">{{ $messages->count() }} message(s)</span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Expéditeur</th>
                                <th>titre</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $message)
                                <tr class="{{ $message->read_at ? '' : 'fw-bold' }}">
                                    <td>{{ $message->id }}</td>
                                    <td>
                                        @if ($message->user)
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-light-primary me-2">
                                                    {{ substr($message->user->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    {{ $message->user->name }}<br>
                                                    <small>{{ $message->user->email }}</small>
                                                </div>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-light-secondary me-2">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <div>
                                                    Visiteur<br>
                                                    <small>Non enregistré</small>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($message->subject, 30) }}</td>
                                    <td>{{ Str::limit($message->message, 50) }}</td>
                                    <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>

                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.messages.show', $message) }}"
                                                class="btn btn-sm btn-primary me-2" title="Voir">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">Aucun message trouvé</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($messages->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $messages->withQueryString()->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewMessageModal" tabindex="-1" aria-labelledby="viewMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="viewMessageModalLabel">Détails du message</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body" id="messageDetails">
                    <!-- Content will be loaded via AJAX -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="replyBtn" data-bs-toggle="modal"
                        data-bs-target="#replyMessageModal">
                        <i class="fas fa-reply me-1"></i> Répondre
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Reply Modal -->
    <div class="modal fade" id="replyMessageModal" tabindex="-1" aria-labelledby="replyMessageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="replyMessageModalLabel">Répondre au message</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="replyForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="replySubject" class="form-label">Sujet</label>
                            <input type="text" class="form-control" id="replySubject" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="replyMessage" class="form-label">Message</label>
                            <textarea class="form-control" id="replyMessage" name="message" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-paper-plane me-1"></i> Envoyer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // View message details
            document.querySelectorAll('[data-bs-target="#viewMessageModal"]').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');

                    fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('messageDetails').innerHTML = html;

                            // Mark as read
                            if (!this.closest('tr').classList.contains('fw-bold')) {
                                fetch(url + '/mark-as-read', {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json'
                                    }
                                });
                            }
                        });
                });
            });

            // Setup reply form
            document.getElementById('replyBtn')?.addEventListener('click', function() {
                const messageId = document.getElementById('messageDetails').getAttribute('data-message-id');
                const recipientEmail = document.getElementById('messageDetails').getAttribute('data-sender-email');

                document.getElementById('replyForm').action = `/admin/messages/${messageId}/reply`;
                document.getElementById('replySubject').value = 'RE: ' + document.getElementById('messageDetails')
                    .getAttribute('data-message-subject');
            });
        </script>
    @endpush
@endsection
