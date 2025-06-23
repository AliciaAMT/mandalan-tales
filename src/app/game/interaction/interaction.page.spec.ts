import { ComponentFixture, TestBed } from '@angular/core/testing';
import { InteractionPage } from './interaction.page';

describe('InteractionPage', () => {
  let component: InteractionPage;
  let fixture: ComponentFixture<InteractionPage>;

  beforeEach(() => {
    fixture = TestBed.createComponent(InteractionPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
