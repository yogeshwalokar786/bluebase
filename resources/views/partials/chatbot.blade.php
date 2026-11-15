<!-- Bluebase AI Interactive Chatbot Widget -->
<div id="bluebaseChatWidget" class="bb-chat-widget">
  <!-- Floating Launch Button -->
  <button id="bbChatToggle" class="bb-chat-launcher" aria-label="Open AI Assistant" title="Chat with Bluebase AI">
    <div class="bb-launcher-icon-open">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
      </svg>
      <span class="bb-launcher-pulse"></span>
    </div>
    <div class="bb-launcher-icon-close" style="display: none;">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="18" y1="6" x2="6" y2="18"></line>
        <line x1="6" y1="6" x2="18" y2="18"></line>
      </svg>
    </div>
    <span class="bb-launcher-label">Ask Bluebase AI</span>
  </button>

  <!-- Chat Floating Window Container -->
  <div id="bbChatWindow" class="bb-chat-window" style="display: none;" role="dialog" aria-modal="true" aria-label="Bluebase AI Live Chat">
    <!-- Window Header -->
    <div class="bb-chat-header">
      <div class="bb-header-agent">
        <div class="bb-avatar-wrap">
          <div class="bb-agent-avatar">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="10" rx="2"></rect>
              <circle cx="12" cy="5" r="2"></circle>
              <path d="M12 7v4"></path>
              <line x1="8" y1="16" x2="8" y2="16"></line>
              <line x1="16" y1="16" x2="16" y2="16"></line>
            </svg>
          </div>
          <span class="bb-online-dot"></span>
        </div>
        <div class="bb-agent-info">
          <div class="bb-agent-name">Bluebase AI Assistant</div>
          <div class="bb-agent-status">Online &bull; Instant Software Advisory</div>
        </div>
      </div>
      <div class="bb-header-actions">
        <button type="button" id="bbChatReset" class="bb-header-btn" title="Restart Conversation" aria-label="Restart Conversation">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="1 4 1 10 7 10"></polyline>
            <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
          </svg>
        </button>
        <button type="button" id="bbChatClose" class="bb-header-btn" title="Minimize Chat" aria-label="Minimize Chat">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>
    </div>

    <!-- Messages Body Feed -->
    <div id="bbChatMessages" class="bb-chat-messages">
      <!-- Loading indicator while initializing -->
      <div id="bbChatLoading" class="bb-chat-initial-loader">
        <div class="bb-dot-pulse"></div>
        <span>Connecting to Bluebase AI...</span>
      </div>
    </div>

    <!-- Quick Reply Chips -->
    <div id="bbChatSuggestions" class="bb-chat-suggestions" style="display: none;"></div>

    <!-- Window Footer Input Bar -->
    <form id="bbChatForm" class="bb-chat-input-bar">
      @csrf
      <input type="text" id="bbChatInput" class="bb-chat-input" placeholder="Type your message..." autocomplete="off" maxlength="1500" required>
      <button type="submit" id="bbChatSendBtn" class="bb-chat-send-btn" aria-label="Send message">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="22" y1="2" x2="11" y2="13"></line>
          <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
        </svg>
      </button>
    </form>
    <div class="bb-chat-footnote">
      Automated AI Assistant &bull; Nagpur, India &bull; bluebasetechnologies.com
    </div>
  </div>
</div>

<style>
/* Chat Widget Floating Styles */
.bb-chat-widget {
  position: fixed;
  bottom: 24px;
  right: 24px;
  z-index: 99999;
  font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}

/* Floating Launcher Button */
.bb-chat-launcher {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 12px 18px 12px 14px;
  border-radius: 9999px;
  border: 1px solid rgba(96, 165, 250, 0.4);
  background: linear-gradient(135deg, #0050E7, #0B194D);
  color: #ffffff;
  font-size: 0.92rem;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 10px 30px rgba(0, 80, 231, 0.38), 0 2px 8px rgba(0, 0, 0, 0.3);
  transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
  position: relative;
  outline: none;
}
.bb-chat-launcher:hover {
  transform: translateY(-3px) scale(1.02);
  box-shadow: 0 16px 40px rgba(0, 80, 231, 0.55), 0 4px 12px rgba(0, 0, 0, 0.4);
  border-color: rgba(147, 197, 253, 0.7);
}
.bb-launcher-icon-open, .bb-launcher-icon-close {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 26px;
  height: 26px;
  position: relative;
}
.bb-launcher-icon-open svg, .bb-launcher-icon-close svg {
  width: 22px;
  height: 22px;
}
.bb-launcher-pulse {
  position: absolute;
  top: -2px;
  right: -2px;
  width: 9px;
  height: 9px;
  border-radius: 50%;
  background: #10B981;
  border: 2px solid #0050E7;
  animation: bbPulse 2s infinite;
}
@keyframes bbPulse {
  0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
  70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
  100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
}

/* Chat Window */
.bb-chat-window {
  position: absolute;
  bottom: 64px;
  right: 0;
  width: 390px;
  max-width: calc(100vw - 32px);
  height: 570px;
  max-height: calc(100vh - 110px);
  background: #090E23;
  border: 1px solid rgba(96, 165, 250, 0.25);
  border-radius: 18px;
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.75), 0 0 40px rgba(0, 80, 231, 0.2);
  display: flex;
  flex-direction: column;
  overflow: hidden;
  animation: bbSlideUp 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes bbSlideUp {
  from { opacity: 0; transform: translateY(16px) scale(0.96); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}

/* Header */
.bb-chat-header {
  padding: 14px 18px;
  background: linear-gradient(135deg, #001f5c, #090e23);
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 12px;
  flex-shrink: 0;
}
.bb-header-agent {
  display: flex;
  align-items: center;
  gap: 12px;
  min-width: 0;
}
.bb-avatar-wrap {
  position: relative;
  flex-shrink: 0;
}
.bb-agent-avatar {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  background: linear-gradient(135deg, #0050E7, #38BDF8);
  display: flex;
  align-items: center;
  justify-content: center;
  color: #ffffff;
  box-shadow: 0 4px 12px rgba(0, 80, 231, 0.35);
}
.bb-agent-avatar svg { width: 20px; height: 20px; }
.bb-online-dot {
  position: absolute;
  bottom: 0;
  right: 0;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: #10B981;
  border: 2px solid #090E23;
}
.bb-agent-name {
  font-size: 0.94rem;
  font-weight: 700;
  color: #ffffff;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.bb-agent-status {
  font-size: 0.73rem;
  color: #93C5FD;
}
.bb-header-actions {
  display: flex;
  align-items: center;
  gap: 6px;
  flex-shrink: 0;
}
.bb-header-btn {
  background: rgba(255, 255, 255, 0.08);
  border: 1px solid rgba(255, 255, 255, 0.12);
  color: #CBD5E1;
  width: 30px;
  height: 30px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s;
}
.bb-header-btn:hover {
  background: rgba(255, 255, 255, 0.18);
  color: #ffffff;
}
.bb-header-btn svg { width: 15px; height: 15px; }

/* Messages Feed */
.bb-chat-messages {
  flex: 1;
  padding: 16px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 14px;
  background: #060A1A;
  scroll-behavior: smooth;
}
.bb-chat-messages::-webkit-scrollbar { width: 6px; }
.bb-chat-messages::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.12); border-radius: 10px; }

.bb-chat-initial-loader {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 12px;
  color: #94A3B8;
  font-size: 0.85rem;
  height: 100%;
}
.bb-dot-pulse {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #0050E7;
  animation: bbPulse 1.2s infinite;
}

/* Chat Bubbles */
.bb-msg-row {
  display: flex;
  gap: 10px;
  max-width: 88%;
  animation: bbFadeIn 0.2s ease-out;
}
@keyframes bbFadeIn {
  from { opacity: 0; transform: translateY(6px); }
  to { opacity: 1; transform: translateY(0); }
}

.bb-msg-row.bb-msg-bot {
  align-self: flex-start;
}
.bb-msg-row.bb-msg-user {
  align-self: flex-end;
  flex-direction: row-reverse;
}

.bb-msg-avatar {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  flex-shrink: 0;
  display: flex;
  align-items: center;
  justify-content: center;
}
.bb-msg-bot .bb-msg-avatar {
  background: #0050E7;
  color: #ffffff;
}
.bb-msg-bot .bb-msg-avatar svg { width: 14px; height: 14px; }
.bb-msg-user .bb-msg-avatar {
  background: #10B981;
  color: #ffffff;
}
.bb-msg-user .bb-msg-avatar svg { width: 14px; height: 14px; }

.bb-msg-bubble-wrap {
  display: flex;
  flex-direction: column;
  gap: 4px;
}
.bb-msg-bubble {
  padding: 10px 14px;
  border-radius: 14px;
  font-size: 0.88rem;
  line-height: 1.55;
  word-break: break-word;
  white-space: pre-wrap;
}
.bb-msg-bot .bb-msg-bubble {
  background: #121A3A;
  color: #E2E8F0;
  border: 1px solid rgba(96, 165, 250, 0.2);
  border-top-left-radius: 2px;
}
.bb-msg-user .bb-msg-bubble {
  background: linear-gradient(135deg, #0050E7, #003db3);
  color: #ffffff;
  border-top-right-radius: 2px;
  box-shadow: 0 4px 14px rgba(0, 80, 231, 0.25);
}
.bb-msg-time {
  font-size: 0.68rem;
  color: #64748B;
  padding: 0 4px;
}
.bb-msg-user .bb-msg-time {
  text-align: right;
}

/* Typing Indicator */
.bb-typing-indicator {
  display: flex;
  align-items: center;
  gap: 5px;
  padding: 10px 14px;
  background: #121A3A;
  border: 1px solid rgba(96, 165, 250, 0.2);
  border-radius: 14px;
  border-top-left-radius: 2px;
  width: fit-content;
}
.bb-typing-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #60A5FA;
  animation: bbBounce 1.4s infinite ease-in-out both;
}
.bb-typing-dot:nth-child(1) { animation-delay: -0.32s; }
.bb-typing-dot:nth-child(2) { animation-delay: -0.16s; }
@keyframes bbBounce {
  0%, 80%, 100% { transform: scale(0); opacity: 0.4; }
  40% { transform: scale(1); opacity: 1; }
}

/* Suggestion Quick Chips */
.bb-chat-suggestions {
  padding: 8px 14px;
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  background: #090E23;
  border-top: 1px solid rgba(255, 255, 255, 0.05);
  max-height: 100px;
  overflow-y: auto;
  flex-shrink: 0;
}
.bb-chip {
  background: rgba(0, 80, 231, 0.15);
  border: 1px solid rgba(96, 165, 250, 0.35);
  color: #93C5FD;
  font-size: 0.74rem;
  font-weight: 500;
  padding: 5px 11px;
  border-radius: 9999px;
  cursor: pointer;
  transition: all 0.2s;
  white-space: nowrap;
}
.bb-chip:hover {
  background: #0050E7;
  color: #ffffff;
  border-color: #0050E7;
  transform: translateY(-1px);
}

/* Input Bar */
.bb-chat-input-bar {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 12px 14px;
  background: #090E23;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  flex-shrink: 0;
}
.bb-chat-input {
  flex: 1;
  background: #060A1A;
  border: 1px solid rgba(255, 255, 255, 0.12);
  border-radius: 10px;
  color: #F8FAFC;
  font-size: 0.88rem;
  padding: 10px 14px;
  outline: none;
  transition: border-color 0.2s;
}
.bb-chat-input:focus {
  border-color: #0050E7;
  box-shadow: 0 0 0 3px rgba(0, 80, 231, 0.2);
}
.bb-chat-input::placeholder {
  color: #64748B;
}
.bb-chat-send-btn {
  width: 38px;
  height: 38px;
  border-radius: 10px;
  background: #0050E7;
  border: none;
  color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s;
  flex-shrink: 0;
}
.bb-chat-send-btn:hover {
  background: #003db3;
  transform: translateY(-1px);
}
.bb-chat-send-btn:disabled {
  opacity: 0.5;
  cursor: not-allowed;
  transform: none;
}
.bb-chat-send-btn svg { width: 17px; height: 17px; }

.bb-chat-footnote {
  padding: 6px 14px;
  text-align: center;
  font-size: 0.65rem;
  color: #64748B;
  background: #060A1A;
  border-top: 1px solid rgba(255, 255, 255, 0.03);
}

/* Adjust Back to Top button position so they don't collide */
.back-to-top {
  bottom: 86px !important;
  right: 24px !important;
}

/* Responsive adjustments */
@media (max-width: 480px) {
  .bb-chat-widget {
    bottom: 16px;
    right: 16px;
  }
  .bb-launcher-label {
    display: none;
  }
  .bb-chat-launcher {
    padding: 12px;
    border-radius: 50%;
  }
  .bb-chat-window {
    position: fixed;
    bottom: 0;
    right: 0;
    left: 0;
    top: 0;
    width: 100vw;
    max-width: 100vw;
    height: 100vh;
    max-height: 100vh;
    border-radius: 0;
    border: none;
  }
  .back-to-top {
    bottom: 74px !important;
    right: 16px !important;
  }
}
</style>

<script>
(function() {
  const STORAGE_KEY = 'bluebase_ai_chat_uuid';
  let sessionUuid = localStorage.getItem(STORAGE_KEY) || null;
  let isSending = false;

  const toggleBtn = document.getElementById('bbChatToggle');
  const chatWindow = document.getElementById('bbChatWindow');
  const closeBtn = document.getElementById('bbChatClose');
  const resetBtn = document.getElementById('bbChatReset');
  const messagesBox = document.getElementById('bbChatMessages');
  const chatForm = document.getElementById('bbChatForm');
  const chatInput = document.getElementById('bbChatInput');
  const sendBtn = document.getElementById('bbChatSendBtn');
  const suggestionsBox = document.getElementById('bbChatSuggestions');
  const iconOpen = toggleBtn.querySelector('.bb-launcher-icon-open');
  const iconClose = toggleBtn.querySelector('.bb-launcher-icon-close');

  let hasInitialized = false;

  // Toggle chat window open / closed
  function toggleChat(forceOpen) {
    const isClosed = (chatWindow.style.display === 'none' || chatWindow.style.display === '');
    const shouldOpen = (forceOpen !== undefined) ? forceOpen : isClosed;

    if (shouldOpen) {
      chatWindow.style.display = 'flex';
      iconOpen.style.display = 'none';
      iconClose.style.display = 'flex';
      if (!hasInitialized) {
        initChatSession();
      } else {
        setTimeout(() => chatInput.focus(), 150);
      }
    } else {
      chatWindow.style.display = 'none';
      iconOpen.style.display = 'flex';
      iconClose.style.display = 'none';
    }
  }

  toggleBtn.addEventListener('click', () => toggleChat());
  closeBtn.addEventListener('click', () => toggleChat(false));

  // Reset conversation
  resetBtn.addEventListener('click', function() {
    if (confirm('Restart conversation with Bluebase AI?')) {
      localStorage.removeItem(STORAGE_KEY);
      sessionUuid = null;
      messagesBox.innerHTML = '<div class="bb-chat-initial-loader"><div class="bb-dot-pulse"></div><span>Connecting to Bluebase AI...</span></div>';
      suggestionsBox.style.display = 'none';
      suggestionsBox.innerHTML = '';
      hasInitialized = false;
      initChatSession();
    }
  });

  // Fetch CSRF token from page
  function getCsrfToken() {
    const meta = document.querySelector('meta[name="csrf-token"]');
    if (meta) return meta.getAttribute('content');
    const input = document.querySelector('input[name="_token"]');
    return input ? input.value : '';
  }

  // Initialize or resume chat
  async function initChatSession() {
    hasInitialized = true;
    try {
      const response = await fetch('{{ route("chat.init") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': getCsrfToken(),
          'Accept': 'application/json'
        },
        body: JSON.stringify({ session_uuid: sessionUuid })
      });

      if (!response.ok) throw new Error('Network error initializing chat');
      const data = await response.json();

      sessionUuid = data.session_uuid;
      localStorage.setItem(STORAGE_KEY, sessionUuid);

      messagesBox.innerHTML = '';

      if (data.messages && data.messages.length > 0) {
        data.messages.forEach(msg => {
          appendMessage(msg.sender, msg.message, msg.time);
        });
        const lastMsg = data.messages[data.messages.length - 1];
        if (lastMsg && lastMsg.suggestions && lastMsg.suggestions.length > 0) {
          renderSuggestions(lastMsg.suggestions);
        }
      }

      updatePlaceholder(data.step);
      scrollBottom();
      setTimeout(() => chatInput.focus(), 150);
    } catch (err) {
      console.error('Chatbot Init Error:', err);
      messagesBox.innerHTML = '<div style="color: #EF4444; text-align: center; padding: 20px; font-size: 0.85rem;">Could not connect to assistant. Please refresh or try again later.</div>';
    }
  }

  // Update input placeholder based on current stage
  function updatePlaceholder(step) {
    chatInput.placeholder = 'Ask about web, mobile, SaaS MVP, AI, pricing...';
  }

  // Render message bubble
  function appendMessage(sender, text, time) {
    const isBot = (sender === 'bot');
    const timeStr = time || new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    const row = document.createElement('div');
    row.className = `bb-msg-row ${isBot ? 'bb-msg-bot' : 'bb-msg-user'}`;

    const avatar = document.createElement('div');
    avatar.className = 'bb-msg-avatar';
    if (isBot) {
      avatar.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="2"/></svg>';
    } else {
      avatar.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>';
    }

    const wrap = document.createElement('div');
    wrap.className = 'bb-msg-bubble-wrap';

    const bubble = document.createElement('div');
    bubble.className = 'bb-msg-bubble';
    if (isBot) {
      const temp = document.createElement('div');
      temp.textContent = text;
      let safe = temp.innerHTML;
      safe = safe.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
      bubble.innerHTML = safe;
    } else {
      bubble.textContent = text;
    }

    const timeElem = document.createElement('div');
    timeElem.className = 'bb-msg-time';
    timeElem.textContent = timeStr;

    wrap.appendChild(bubble);
    wrap.appendChild(timeElem);

    row.appendChild(avatar);
    row.appendChild(wrap);

    messagesBox.appendChild(row);
    scrollBottom();
  }

  // Show typing indicator
  function showTypingIndicator() {
    const row = document.createElement('div');
    row.id = 'bbTypingIndicator';
    row.className = 'bb-msg-row bb-msg-bot';
    row.innerHTML = `
      <div class="bb-msg-avatar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="2"/></svg>
      </div>
      <div class="bb-typing-indicator">
        <div class="bb-typing-dot"></div>
        <div class="bb-typing-dot"></div>
        <div class="bb-typing-dot"></div>
      </div>
    `;
    messagesBox.appendChild(row);
    scrollBottom();
  }

  function removeTypingIndicator() {
    const elem = document.getElementById('bbTypingIndicator');
    if (elem) elem.remove();
  }

  // Render quick chips
  function renderSuggestions(suggestions) {
    suggestionsBox.innerHTML = '';
    if (!suggestions || suggestions.length === 0) {
      suggestionsBox.style.display = 'none';
      return;
    }
    suggestionsBox.style.display = 'flex';
    suggestions.forEach(text => {
      const chip = document.createElement('button');
      chip.type = 'button';
      chip.className = 'bb-chip';
      chip.textContent = text;
      chip.addEventListener('click', () => {
        chatInput.value = text;
        submitUserMessage();
      });
      suggestionsBox.appendChild(chip);
    });
    scrollBottom();
  }

  // Send message handler
  async function submitUserMessage() {
    const text = chatInput.value.trim();
    if (!text || isSending) return;

    isSending = true;
    chatInput.value = '';
    sendBtn.disabled = true;

    // Append user message immediately
    appendMessage('user', text);
    suggestionsBox.style.display = 'none';

    // Show bot typing
    showTypingIndicator();

    try {
      const response = await fetch('{{ route("chat.message") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': getCsrfToken(),
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          session_uuid: sessionUuid,
          message: text
        })
      });

      removeTypingIndicator();

      if (!response.ok) throw new Error('Error processing message');
      const data = await response.json();

      appendMessage('bot', data.reply, data.time);
      updatePlaceholder(data.step);

      if (data.suggestions && data.suggestions.length > 0) {
        renderSuggestions(data.suggestions);
      }
    } catch (err) {
      removeTypingIndicator();
      console.error('Chat error:', err);
      appendMessage('bot', 'Sorry, I encountered a temporary network issue. Please try sending your message again.');
    } finally {
      isSending = false;
      sendBtn.disabled = false;
      chatInput.focus();
    }
  }

  chatForm.addEventListener('submit', function(e) {
    e.preventDefault();
    submitUserMessage();
  });

  function scrollBottom() {
    messagesBox.scrollTop = messagesBox.scrollHeight;
  }
})();
</script>
