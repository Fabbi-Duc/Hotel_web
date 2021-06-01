importScripts("https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js");
importScripts(
  "https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"
);
// For an optimal experience using Cloud Messaging, also add the Firebase SDK for Analytics.
importScripts(
  "https://www.gstatic.com/firebasejs/7.16.1/firebase-analytics.js"
);

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
// firebase.initializeApp({
//   apiKey: "AIzaSyDFWcGGxmXbNearyx8qO-LjmHPAeG7Hv-U",
//   authDomain: "send-notification-a2a5e.firebaseapp.com",
//   projectId: "send-notification-a2a5e",
//   storageBucket: "send-notification-a2a5e.appspot.com",
//   messagingSenderId: "207432167226",
//   appId: "1:207432167226:web:c91e91cb8d16052e25aa03",
//   measurementId: "G-9K98CB4FFV"
// });

firebase.initializeApp( {
  apiKey: "AIzaSyD90oejTbePL-GbnFzOq-a-vGiL_XZOubQ",
  authDomain: "prego-pwa.firebaseapp.com",
  projectId: "prego-pwa",
  storageBucket: "prego-pwa.appspot.com",
  messagingSenderId: "351352887791",
  appId: "1:351352887791:web:dba143ace31637df137e1a",
  measurementId: "G-S1RGMRX1W5"
  });
  // Initialize Firebase

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
  console.log(
    "[firebase-messaging-sw.js] Received background message ",
    payload
  );
  // Customize notification here
  const notificationTitle = "Background Message Title";
  const notificationOptions = {
    body: "Background Message body.",
    icon: "/itwonders-web-logo.png"
  };

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions
  );
});
