const steps = document.querySelectorAll('.step');
const sections = document.querySelectorAll('.form-section');
const nextButtons = document.querySelectorAll('.next-button');

function showStep(stepNumber) {
  steps.forEach((step, index) => {
    step.classList.toggle('active', index + 1 === stepNumber);
  });

  sections.forEach((section, index) => {
    section.classList.toggle('hidden', index + 1 !== stepNumber);
  });
}

steps.forEach(step => {
  step.addEventListener('click', () => {
    const stepNumber = parseInt(step.getAttribute('data-step'));
    showStep(stepNumber);
  });
});

nextButtons.forEach(button => {
  button.addEventListener('click', () => {
    const nextStep = parseInt(button.getAttribute('data-next'));
    showStep(nextStep);
  });
});

// Initialize
showStep(1);
const prevButtons = document.querySelectorAll('.prev-button');

prevButtons.forEach(button => {
button.addEventListener('click', () => {
const prevStep = parseInt(button.getAttribute('data-prev'));
showStep(prevStep);
});
});


 // Handle navigation between steps
 document.querySelectorAll('.next-button').forEach(button => {
    button.addEventListener('click', function () {
      const currentStep = this.closest('.form-section');
      const nextStepId = this.getAttribute('data-next');
      const nextStep = document.getElementById(`step-${nextStepId}`);
      if (nextStep) {
        currentStep.style.display = 'none';
        nextStep.style.display = 'block';
      }
    });
  });

  document.querySelectorAll('.prev-button').forEach(button => {
    button.addEventListener('click', function () {
      const currentStep = this.closest('.form-section');
      const prevStepId = this.getAttribute('data-prev');
      const prevStep = document.getElementById(`step-${prevStepId}`);
      if (prevStep) {
        currentStep.style.display = 'none';
        prevStep.style.display = 'block';
      }
    });
  });

  function navigateToStep(step) {
    document.querySelectorAll('.form-section').forEach(section => {
      section.style.display = 'none';
    });
    document.querySelector(`#step-${step}`).style.display = 'block';

    document.querySelectorAll('.step').forEach(stepElement => {
      stepElement.classList.remove('active');
    });
    document.querySelector(`.step[data-step="${step}"]`).classList.add('active');
  }