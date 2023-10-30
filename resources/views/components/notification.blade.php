  <style>
      /* Notification container */
      .notification-container {
          display: flex;
          align-items: center;
          margin: 10px;
      }

      /* Notification item */
      .notification-item {
          border: 1px solid #ddd;
          border-radius: 4px;
          padding: 10px;
          max-width: 100%;
          overflow: hidden;
          text-overflow: ellipsis;
          transition: max-width 0.5s;

          white-space: nowrap;
          /* Prevent text wrapping */
      }

      /* Expand on hover */
      .notification-item.expanded {
          max-width: none;
          white-space: normal;

          transform: scale(1.50);
          /* Increase the size */
          box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);

          white-space: normal;
      }
  </style>
  <div>
      <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <!-- Add your notification content here -->
                      <div class="notifications">
                          <div class="notification-container">
                              <div class="notification-item bg-white">
                                  <div class="row">
                                      <div class="col-lg-8">
                                          <strong>Welcome to our platform!</strong><br>
                                      </div>
                                      <div class="col-lg-4">
                                          <small>5 minutes ago</small>
                                      </div>

                                  </div>
                                  We are excited to have you join our community of developers. Our platform offers a
                                  wide range of tools and resources to help you build amazing applications and websites.

                                  As a new user, we recommend that you take some time to explore our platform and
                                  familiarize yourself with its features. You can browse our documentation, watch video
                                  tutorials, and join our community forums to connect with other developers.

                                  We also offer a range of premium features and services to help you take your
                                  development skills to the next level. Our premium plans include access to exclusive
                                  content, personalized support, and advanced tools for building complex applications.

                                  If you have any questions or need help getting started, please don't hesitate to
                                  contact our support team. We are here to help you succeed and achieve your goals as a
                                  developer.

                                  Thank you for choosing our platform. We look forward to seeing what you will create!

                                  <div class="mt-3 ">
                                      <div class="btn-group gap-3 d-flex" role="group"
                                          aria-label="Notification Actions">
                                          <button type="button" class="btn btn-outline-warning">
                                              <span class="material-symbols-outlined">
                                                  mark_email_read
                                              </span>
                                          </button>
                                          <button type="button" class="btn btn-outline-danger">
                                              <span class="material-symbols-outlined">
                                                  delete
                                              </span>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="notification-container">
                              <div class="notification-item">
                                  This is a shorter notification.
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
              </div>
          </div>
      </div>
      <script>
          // Get all notification items
          const notificationItems = document.querySelectorAll('.notification-item');

          // Add a click event listener to each notification item
          notificationItems.forEach(item => {
              item.addEventListener('click', () => {
                  // Toggle the "expanded" class on the clicked item
                  item.classList.toggle('expanded');
              });
          });
      </script>
  </div>
