<div class="tickets-container" data-tablero-id="<?php echo $tablero['id']; ?>" style="max-width: 100%;">

                            <?php
                                $stmt_tickets = $pdo->prepare("SELECT * FROM tickets WHERE tablero_id = ? ORDER BY posicion ASC");
                                $stmt_tickets->execute([$tablero['id']]);
                                $tickets = $stmt_tickets->fetchAll(PDO::FETCH_ASSOC);

                                if (empty($tickets)) {
                                    echo '<div class="empty-placeholder" style="min-height: 80px;"></div>'; // Zona de drop vacía
                                } else {
                                    foreach ($tickets as $ticket) {
                                        ?>

                                    <!--aquii onde esta este comentario empieza un contenedor aqi este div lo debes de envolve en otro para qu ese agaren los estilo-->
                                        <div class="ticket-card" data-id="<?php echo $ticket['id']; ?>" title="<?php echo htmlspecialchars($ticket['titulo']); ?>">
                                        <strong>
                                            <?php echo htmlspecialchars($ticket['titulo']); ?>
                                        </strong><br>
                                        <strong>Cliente:</strong> <?php echo htmlspecialchars($ticket['responsable']); ?><br>
                                        <strong>Fecha:</strong> <?php echo htmlspecialchars($ticket['fecha_contrato']); ?><br>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarTicketModal<?php echo $ticket['id']; ?>">Editar</button>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
                                    </div>

                                        <?php
                                    }
                                }
                            ?>
                        </div>