/**
 * Bluebase Technologies — Upgrade Landing Page Script
 * Smooth UI Telemetry, Deployment Ticker, and Lead Capture
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Interactive Deployment Status Ticker
  const tickerElement = document.getElementById('deploymentTickerText');
  const statuses = [
    'Optimizing Global Content Delivery & Security Headers',
    'Compiling Production Web & Mobile Application Bundles',
    'Upgrading Database Systems & High-Availability Clusters',
    'Refreshing Client Portals & Service Dashboards',
    'Validating SSL Certificates & API Gateway Endpoints',
    'Finalizing Scheduled Maintenance & System Verification'
  ];
  let statusIndex = 0;

  if (tickerElement) {
    setInterval(() => {
      tickerElement.style.opacity = '0';
      tickerElement.style.transform = 'translateY(4px)';
      setTimeout(() => {
        statusIndex = (statusIndex + 1) % statuses.length;
        tickerElement.textContent = statuses[statusIndex];
        tickerElement.style.opacity = '1';
        tickerElement.style.transform = 'translateY(0)';
      }, 300);
    }, 3800);
  }

  // 2. Smooth Percentage Counter
  const pctElement = document.getElementById('progressPercentage');
  if (pctElement) {
    let count = 0;
    const target = 88;
    const duration = 1600;
    const intervalTime = 20;
    const step = target / (duration / intervalTime);

    const timer = setInterval(() => {
      count += step;
      if (count >= target) {
        count = target;
        clearInterval(timer);
      }
      pctElement.textContent = Math.floor(count) + '%';
    }, intervalTime);
  }
});

