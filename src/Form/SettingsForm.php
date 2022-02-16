<?php

namespace Drupal\views_alias_filter\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Configure Views Alias Filter settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'views_alias_filter_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['views_alias_filter.settings'];
  }

  /**
   * {@inheritdoc}
   */
  // public function buildForm(array $form, FormStateInterface $form_state) {
  //   $form['example'] = [
  //     '#type' => 'textfield',
  //     '#title' => $this->t('Example'),
  //     '#default_value' => $this->config('views_alias_filter.settings')->get('example'),
  //   ];
  //   return parent::buildForm($form, $form_state);
  // }

  /**
   * {@inheritdoc}
   */
  // public function validateForm(array &$form, FormStateInterface $form_state) {
  //   if ($form_state->getValue('example') != 'example') {
  //     $form_state->setErrorByName('example', $this->t('The value is not correct.'));
  //   }
  //   parent::validateForm($form, $form_state);
  // }

  /**
   * {@inheritdoc}
   */
  // public function submitForm(array &$form, FormStateInterface $form_state) {
  //   $this->config('views_alias_filter.settings')
  //     ->set('example', $form_state->getValue('example'))
  //     ->save();
  //   parent::submitForm($form, $form_state);
  // }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return t('Are you sure you want to rebuild the Views URL alias table?');
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('views_ui.settings_basic');
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return t('This should only be needed if URL aliases have been updated outside the URL alias edit form.');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return t('Rebuild table');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    views_alias_filter_rebuild();
    $form_state->setRedirectUrl(new Url('views_ui.settings_basic'));
  }


}
